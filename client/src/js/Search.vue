<template>
  <div>
    <h5>Where are you heading today? </h5>
    <b-input-group>
      <b-form-input 
        size="lg"
        v-on:keyup.enter="$emit('set-location', $event.target.value)" 
        v-bind:value="location" 
        placeholder="Enter Japan City">
      </b-form-input>
      <b-input-group-append is-text>
          <b-icon icon="arrow-return-left" aria-hidden="true"></b-icon>
      </b-input-group-append>
    </b-input-group>
  </div>
</template>

<script>
export default {
  data: ()=>({
    loc: ''
  }),
  props: ['location']
}
</script>