<template>
    <div>All Posts</div>
    <ul>
        <li v-for="post in posts">
            {{post.title}}
        </li>
    </ul>
    <button @click="getPosts">Get Posts</button>
</template>

<script>
import axios from "axios";
export default {
    name: "Click",
    data(){
        return {
            posts:[]
        }
    },
    methods:{
        getPosts:function(){
            axios.get("https://jsonplaceholder.typicode.com/posts/")
                .then(res=>{
                this.posts = res.data;
            })
        }
    }
}
</script>
