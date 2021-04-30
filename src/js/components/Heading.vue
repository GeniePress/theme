<template>
  <h1>{{ heading }}</h1>
</template>

<script>


export default {

  props: {
    heading: {
      type: String,
      required: true
    },
  },


}
</script>
