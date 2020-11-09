<template id="container">
  <div id="app-5">
    <div class="mb-5 tm-comment-form">
      <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>

      <div class="mb-4">
        <textarea
          class="form-control"
          id="message"
          name="message"
          rows="6"
        ></textarea>
      </div>
      <div class="text-right">
        <button
          class="tm-btn tm-btn-primary tm-btn-small"
          v-on:click="addComments"
        >
          Submit
        </button>
      </div>
    </div>

    <div class="tm-comment tm-mb-45" v-for="comment in comments" :key="comment.id">
      <figure class="tm-comment-figure">
        <img
          :src="comment.user.info.image"
          alt="Image"
          class="mb-2 rounded-circle img-thumbnail"
          style="height: 100px"
        />
        <figcaption class="tm-color-primary text-center">
          {{ comment.user.name }}
        </figcaption>
      </figure>
      <div>
        <p>
          {{ comment.body }}
        </p>
        <div class="d-flex justify-content-between">
          <span class="tm-color-primary">{{ comment.created_at }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      comments: [],
    };
  },
  props: ["post_id", "user_id"],
  mounted() {
    this.getComment();
  },
  methods: {
    addComments: function () {
      const message = document.getElementById("message").value;
      const comment = {
        body: message,
        post_id: this.post_id,
        user_id: this.user_id,
      };
      const headers = {
        Authorization: "Bearer my-token",
        "My-Custom-Header": "foobar",
      };
      axios
        .post("/api/addComments", comment, { headers })
        .then(() => {
          document.getElementById("message").value = "";
          this.getComment();
        })
        .catch((error) => {
          this.errorMessage = error.message;
          console.error("There was an error!", error);
        });
    },
    getComment: function () {
      axios
        .get("/api/comments?post_id=" + this.post_id)
        .then((response) => {
          this.comments = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
