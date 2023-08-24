<template>
      <div v-for="listing in listings" :key="listing.id">
    <div>
      <!--<Link :href="`/listing/${listing.id}`">-->
      <Link :href="route('listing.show', {listing: listing.id})">
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <div>
      <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
      <!--After using ziggy <Link :href="`/listing/${listing.id}/edit`">Edit</Link>-->
    </div>
    <div>
      <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link>
      <!--<Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link>-->
    </div>
    <!--Important way to specify same routes of GET,POST,PUT detection using inertia js-->
  </div>
  </template>
  
  <script setup>
  import {Link} from '@inertiajs/inertia-vue3'
  import ListingAddress from '@/Components/ListingAddress.vue'
  defineProps({
    listings: Array,
  })
  </script>