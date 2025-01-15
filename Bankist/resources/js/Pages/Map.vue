<template>
    <MyLayout>
        <div class="h-full w-full flex justify-center items-center">
       
    <div style="height: 75vh; width: 50vw;">
      <l-map
        v-model="zoom"
        v-model:zoom="zoom"
        :center="currentPosition || [36.737232, 3.086472]"
        @move="log('move')"
      >
        <l-tile-layer
          url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        ></l-tile-layer>
        <l-control-layers />
  
        <!-- Display ATM markers dynamically -->
        <l-marker
          v-for="(machine, index) in machines"
          :key="index"
          :lat-lng="[machine.latitude, machine.longitude]"
        >
          <l-popup>
            <strong>ATM Machine</strong><br />
            Location: {{ machine.latitude }}, {{ machine.longitude }}
            <br>
            <span class="text-green-500">Actif</span>
            <br>
            <span class="text-blue-500">{{ Math.floor(Math.random() * 10) }} persons on the line</span>
          </l-popup>
        </l-marker>
  
        <!-- Display current position marker -->
        <l-marker v-if="currentPosition" :lat-lng="currentPosition">
          <l-icon
            icon-url="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png"
            icon-size="[25, 41]"
          />
          <l-popup>
            <strong>Your Current Position</strong><br />
            Latitude: {{ currentPosition[0] }}<br />
            Longitude: {{ currentPosition[1] }}
          </l-popup>
        </l-marker>
      </l-map>
      <button @click="changeIcon">New kitten icon</button>
    </div>
         
</div>
    </MyLayout>
  </template>
  
  <script>
  import {
    LMap,
    LIcon,
    LTileLayer,
    LMarker,
    LControlLayers,
    LPopup,
  } from "@vue-leaflet/vue-leaflet";
  import "leaflet/dist/leaflet.css";
  import axios from "axios";
  import { onMounted, ref, computed } from "vue";
import MyLayout from "@/Layouts/MyLayout.vue";
  
  export default {
    components: {
      LMap,
      LIcon,
      LTileLayer,
      LMarker,
      LControlLayers,
      LPopup,
      MyLayout
    },
    setup() {
      const zoom = ref(12);
      const machines = ref([]);
      const currentPosition = ref(null);
  
      const fetchMachines = async () => {
        try {
          const response = await axios.get("/map/machines");
          machines.value = response.data; // Assuming the response is an array of machines with lat/long
        } catch (error) {
          console.error("Error fetching ATM machines:", error);
        }
      };
  
      const getCurrentPosition = () => {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              currentPosition.value = [
                position.coords.latitude,
                position.coords.longitude,
              ];
            },
            (error) => {
              console.error("Error fetching current position:", error);
            }
          );
        } else {
          console.warn("Geolocation is not supported by this browser.");
        }
      };
  
      onMounted(() => {
        fetchMachines();
        getCurrentPosition();
      });
  
      const iconWidth = ref(25);
      const iconHeight = ref(40);
  
      const iconUrl = computed(() => `https://placekitten.com/${iconWidth.value}/${iconHeight.value}`);
      const iconSize = computed(() => [iconWidth.value, iconHeight.value]);
  
      const changeIcon = () => {
        iconWidth.value += 2;
        if (iconWidth.value > iconHeight.value) {
          iconWidth.value = Math.floor(iconHeight.value / 2);
        }
      };
  
      return {
        zoom,
        machines,
        currentPosition,
        iconWidth,
        iconHeight,
        iconUrl,
        iconSize,
        changeIcon,
      };
    },
  };
  </script>
  