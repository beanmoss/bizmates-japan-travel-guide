<template>
  <div>
    <b-navbar type="dark" variant="warning">
      <b-navbar-brand href="#">Japan Travel Guide</b-navbar-brand>
    </b-navbar>
    <b-container>
      
      <b-row class="justify-content-md-center">
        <b-col cols-lg="6" cols-sm="12">
          <Search class="search" v-bind:location="location" v-on:set-location="location = $event"></Search>
          <b-alert v-if="alert" show variant="light">{{alert}}</b-alert>
        </b-col>
      </b-row>
      
      <b-overlay v-bind:show="weather_overlay_show" rounded="sm">
        <Weather class="weather" v-bind:weather="weather"></Weather>
      </b-overlay>
      
      <p></p>
      
      <b-overlay v-bind:show="venue_overlay_show" rounded="sm">
        <Places class="places" v-bind:venues="venues"></Places>
      </b-overlay>
    </b-container>
  </div>
</template>

<script>
import Search from './Search';
import Weather from './Weather';
import Places from './Places';
import weatherService from './services/weather';
import venueService from './services/venue';

const FREQUENT_VENUES = ['Tokyo', 'Yokohama', 'Kyoto', 'Osaka', 'Sapporo', 'Nagoya'];


function getRandomVenue(){
  const i = Math.floor(Math.random() * FREQUENT_VENUES.length);
  return FREQUENT_VENUES[i]; 
}

export default {
  data: ()=>({
    location: 'Tokyo',
    weather: {},
    venues: [],
    weather_overlay_show: false,
    venue_overlay_show: false,
    alert: ""
  }),
  components: {
    Weather,
    Search,
    Places
  },
  watch: {
    location: function(newLocation){
      this.weather_overlay_show = true;
      this.venue_overlay_show = true;
      // this.alert = '';
      
      weatherService.get(newLocation).then((response) => {
        
        const w = response.data;
        
        this.weather = {
          image_url: `//openweathermap.org/img/wn/${w.icon}@2x.png`,
          description: w.weather_description,
          temp: `${w.temp.value} ${w.temp.unit}`,
          temp_min: `${w.temp_min.value} ${w.temp_min.unit}`,
          temp_max: `${w.temp_max.value} ${w.temp_max.unit}`,
        }
        
        this.weather_overlay_show = false;
        this.alert = '';

        venueService.get(newLocation).then((response) => {
          const venues = response.data.response.venues;
          
          this.venues = venues.map((venue)=>{
            return {
              id: venue.id,
              name: venue.name,
              address: venue.location.address,
              type: venue.categories[0] ? venue.categories[0].shortName : '',
              image_url: venue.categories[0] ? `${venue.categories[0].icon.prefix}88.png`: 'https://foursquare.com/img/categories/building/default_88.png'
            }
          })
          this.venue_overlay_show = false;
        });
      }).catch(()=>{
        this.location = getRandomVenue();
        this.alert = `Oops sorry, I can't find that place in Japan, how about ${this.location}`
      });

      
    }
  },
  created: function(){
    this.location = getRandomVenue();
  }
}
</script>

<style scoped>
  .search {
    padding-top: 15px;
    padding-bottom: 15px;
  }
  .weather {
    padding-top: 15px;
    padding-bottom: 15px;
  }
  .places {
    padding-top: 15px;
    padding-bottom: 15px;
  }
</style>