<template>
<div class="menu_srch d-flex" >
    <i class="fa fa-search search_btn" @click="showSearch = !showSearch"></i>
    <!-- SEARCH INPUT -->
    <div class="header_serch" v-if="showSearch">
        <div class="header_serch_input">
            <input type="text" v-model="str" v-on:keyup.enter="searchBlog" placeholder="Search">
        </div>
        <div class="header_serch_i"  @click="searchBlog">
        <i class="fa fa-search" aria-hidden="true"></i>
        </div>
    </div>
    <!-- SEARCH INPUT -->
</div>
</template>



<script>
export default{
    data(){
        return{
        showSearch : false,
        str : ''
        }
    },
    methods: {
       searchBlog(){
           window.location = `/search?str=${this.str}`
       }
    },
}
</script>