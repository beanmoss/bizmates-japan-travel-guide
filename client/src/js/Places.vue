<template>
  <div>
    <h5>Places nearby</h5>
    <b-card-group columns>
      <b-card 
        no-body
        v-for="venue in venues"
        v-bind:key="venue.id"
      >
      <b-row no-gutters>
        <b-col md="4">
          <b-card-img v-if="venue.image_url" v-bind:src="venue.image_url" alt="Image" class="rounded-0 place-image"></b-card-img>
        </b-col>
        <b-col md="8">
          <b-card-body title="">
            <b-card-text>
              <p>Name: {{venue.name}}</p>
              <p>Address: {{venue.address}}</p>
              <p>Type: {{venue.type}}</p>
            </b-card-text>
          </b-card-body>
        </b-col>
      </b-row>
    </b-card>
    </b-card-group>
  </div>
</template>

<script>
  export default {
    data: ()=>({}),
    props: ['venues']
  }
</script>

<style scoped>

.place-image {
  background-color: black;
}
</style>