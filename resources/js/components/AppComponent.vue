<template>
	<transition
         name="fade"
         mode="out-in"
         @beforeLeave="beforeLeave"
         @enter="enter"
         @afterEnter="afterEnter"
       >
	    <router-view></router-view>
       </transition>
</template>

<script>
    export default {}
</script>