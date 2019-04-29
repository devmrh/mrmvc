<template>
  <div>
    <div class="card" style="width: 18rem;" v-for="(post, index) in posts" :key="index">
      <img class="card-img-top">
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ post.username }}</h6>
        <div>
          <p>{{ post.body }}</p>
        </div>
      </div>
      <div class="card-body">
        <a href="#" class="card-link">
          <i>favorite</i>
        </a>
        <a href="#" class="card-link">more</a>
      </div>
      <div class="card-footer text-muted">{{ post.created_date }}</div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "PostInfo",
  props: ["model"],
  data() {
    return {
      posts: [],
      errors: []
    };
  },
  methods: {
    getPosts() {
      axios
        .get("http://mrmvc.com/?url=pages/posts")
        .then(res => {
          this.posts = res.data;
          console.log(this.posts);
        })
        .catch(e => {
          this.errors.push(e);
        });
    }
  },
  mounted() {
    this.getPosts();
  }
};
</script>
