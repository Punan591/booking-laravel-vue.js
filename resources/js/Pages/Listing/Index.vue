<template>
    <Filters :filters="filters" />
   <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
      <Box v-for="listing in listings.data" :key="listing.id">
    <div>
      <!--<Link :href="`/listing/${listing.id}`">-->
      <Link :href="route('listing.show', {listing: listing.id})">
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" />
      </Link>
    </div>
    <!--After using ziggy <Link :href="`/listing/${listing.id}/edit`">Edit</Link>-->
    <!--Important way to specify same routes of GET,POST,PUT detection using inertia js-->
  </Box>
  </div>
  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
  </div>
  </template>
  
  <script setup>
  import {Link} from '@inertiajs/inertia-vue3'
  import ListingAddress from '@/Components/ListingAddress.vue'
  import Box from '@/Components/UI/Box.vue'
  import ListingSpace from '@/Components/ListingSpace.vue'
  import Price from '@/Components/Price.vue'
  import Pagination from '@/Components/UI/Pagination.vue'
  import Filters from '@/Pages/Listing/Index/Components/Filters.vue'
  
  defineProps({
    listings: Object,
    filters: Object,
  })
  </script>