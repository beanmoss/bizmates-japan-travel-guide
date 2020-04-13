<template>
  <div class="weather-card">
    <h5>Weather today</h5>
    <b-card>

      <b-media>
        <template v-slot:aside>
          <b-img v-if="weather.image_url" v-bind:src="weather.image_url" width="52" alt="placeholder"></b-img>
        </template>

        <h5 class="mt-0">{{weather.description}}</h5>
        <p class="mb-0">
          Temp: {{weather.temp}} | Temp Min: {{weather.temp_min}} | Temp Max: {{weather.temp_max}}
        </p>
      </b-media>
    </b-card>
  </div>
</template>

<script>
  export default {
    data: ()=>({}),
    props: ['weather']
  }
</script>
