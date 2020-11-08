<template id="container">
<div id="app-5">
                

                            <div class="tm-comment tm-mb-45" v-for="comment in comments">
                            {{ message }}
                                <div>
                                    <p>
                                       {{ comment.body }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="tm-color-primary">{{ comment.created_at}}</span>
                                    </div>                                                 
                                </div>                                
                            </div>
                
  <button v-on:click="reverseMessage">Reverse Message</button>
</div>
    
</template>

<script>
const default_layout = "default";


export default {
  computed: {},
  data() {
      return {
          comments:[]
      }
  },
  props:['comments']
  , mounted () {this.getComment()}
  , methods: {
    reverseMessage: function () {
      this.message = this.comments[0].body
    },
    getComment: function()
    {
        axios.get('')
        .then()
        .catch();

    }
  }
};

</script>
