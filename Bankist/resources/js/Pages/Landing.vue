<script setup>
import Tabs from 'primevue/tabs';
import TabList from 'primevue/tablist';
import Tab from 'primevue/tab';
import TabPanels from 'primevue/tabpanels';
import TabPanel from 'primevue/tabpanel';
import Button from 'primevue/button';
import Carousel from 'primevue/carousel';
import { ref, onMounted } from 'vue';
import Typewriter from 'typewriter-effect/dist/core';
const typewriterRef = ref(null);
import { Link } from '@inertiajs/vue3';
onMounted(() => {
  const typewriter = new Typewriter(typewriterRef.value, {
    loop: true,       // Repeat the typewriter effect
    delay: 75,        // Delay between typing each letter
    deleteSpeed: 50,  // Speed at which characters are deleted
  });

  // Define the typing sequence
  typewriter
    .typeString('A simpler banking experience for a simpler life.')
    .pauseFor(1000) // Pause for 1 second
    .deleteAll()    // Delete everything typed so far
    .typeString('Your finances, simplified.')
    .pauseFor(1500) // Pause for 1.5 seconds
    .deleteAll()
    .typeString('Focus on living, we’ll handle the banking')
    .start(); // Start the typewriter effect
});
const testimonals = ref(
  [
    {
      id: 1,
      name: 'John Doe',
      role: 'Customer',
      image: '/imgs/user-1.jpg',
      testimonal_summary: 'Best financial decision ever!',
      text:
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel est vel neque maximus ultricies. Nulla facilisi. Integer ac velit vel nisi ullamcorper lobortis. Donec auctor, mauris vel eleifend viverra, ante velit aliquet ipsum, vel consectetur neque nisi sed neque.',
    },
    {
      id: 2,
      name: 'John Doe',
      role: 'Customer',
      testimonal_summary: 'The best day to join Bankist was one year ago. The second best is today!',
      image: '/imgs/user-2.jpg',
      text:
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel est vel neque maximus ultricies. Nulla facilisi. Integer ac velit vel nisi ullamcorper lobortis. Donec auctor, mauris vel eleifend viverra, ante velit aliquet ipsum, vel consectetur neque nisi sed neque.',
    },
    {
      id: 3,
      name: 'John Doe',
      role: 'Customer',
      testimonal_summary: ' The best day to join Bankist was one year ago. The second best is today!',

      image: '/imgs/user-3.jpg',
      text:
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel est vel neque maximus ultricies. Nulla facilisi. Integer ac velit vel nisi ullamcorper lobortis. Donec auctor, mauris vel eleifend viverra, ante velit aliquet ipsum, vel consectetur neque nisi sed neque.',
    }]
)

const responsiveOptions = ref([
  {
    breakpoint: '1400px',
    numVisible: 2,
    numScroll: 1
  },
  {
    breakpoint: '1199px',
    numVisible: 3,
    numScroll: 1
  },
  {
    breakpoint: '767px',
    numVisible: 2,
    numScroll: 1
  },
  {
    breakpoint: '575px',
    numVisible: 1,
    numScroll: 1
  }
]); 
</script>

<template>
  <header class="backdrop-opacity-lg w-screen h-screen font-bold text-xl">
    <nav class="flex justify-between items-center px-20 py-5 w-full">
      <img data-aos="fade-down" src="/imgs/logo.png" alt="Bankist logo" class="w-52" id="logo" />
      <ul class="flex justify-center items-center space-x-5">
        <li >
          <a  href="#section--1">Features</a>
        </li>
        <li >
          <a  href="#section--2">Operations</a>
        </li>
        <li class="mr-5" >
          <a  href="#section--3">Testimonials</a>
        </li>
        <!-- login register -->
        <li class="flex justify-center items-center space-x-2 pl-5" >
          <Link :href="route('login')">
            <Button label="Log in" rounded raised  size="large" />
          </Link>
          
          <Link :href="route('register')">
          <Button label="Register" class="text-xl" rounded raised size="large" />
          </Link>
        </li>
      </ul>
    </nav>
    <div class="flex justify-between items-center px-64 pb-20 w-screen h-full text-[10px]">
      <div class="flex flex-col items-start space-y-8 mb-16">
        <h1 class="text-[70px]">
          When
          <span class="after:block relative after:bottom-0 after:left-0 after:-z-[1] after:absolute after:content-[''] after:bg-custom-gradient after:bg-[#5ec576] after:opacity-70 after:-skew-x-15 after:w-[100%] after:h-[100%] after:transform after:scale-110">banking</span>
          meets<br />
          <span class="after:block relative after:bottom-0 after:left-0 after:-z-[1] after:absolute after:content-[''] after:bg-custom-gradient after:bg-[#5ec576] after:opacity-70 after:-skew-x-15 after:w-[100%] after:h-[100%] after:transform after:scale-110">minimalist</span>
        </h1>
        <p class="text-2xl" ref="typewriterRef"></p>
        <button class="btn--scroll-to btn--text">Learn more
          <i class="pi-arrow-down animate-bounce pi" style="font-size: 1.5rem;"></i>
        </button>
      </div>
      <img src="/imgs/hero.png" class="mb-16 w-[550px]" alt="Minimalist bank items" />
    </div>
  </header>

  <section class="px-[20rem] py-[10rem] border-t-[#ddd] border-t-[1px] transition-opacity section" id="section--1">
    <div data-aos="fade-up" class="section__title">
      <h2 class="section__description">Features</h2>
      <h3 class="section__header">
        Everything you need in a modern bank and more.
      </h3>
    </div>

    <div class="features">
      <img data-aos="fade-right" data-aos-duration="1500" src="/imgs/digital.jpg" alt="Computer"
        class="shadow-xl rounded-2xl" />
      <div data-aos="fade-left" data-aos-duration="1500" class="features__feature">
        <div class="features__icon">
          <i class="pi-desktop pi" style="font-size: 2rem"></i>
        </div>
        <h5 data-aos="fade-left" data-aos-duration="500" data-aos-delay="200" class="features__header">100% digital bank
        </h5>
        <p data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde alias
          sint quos? Accusantium a fugiat porro reiciendis saepe quibusdam
          debitis ducimus.
        </p>
      </div>

      <div data-aos="fade-left" data-aos-duration="1500" class="features__feature">
        <div class="features__icon">
          <i class="pi pi-chart-line" style="font-size: 2rem;"></i>
        </div>
        <h5 class="features__header">Watch your money grow</h5>
        <p>
          Nesciunt quos autem dolorum voluptates cum dolores dicta fuga
          inventore ab? Nulla incidunt eius numquam sequi iste pariatur
          quibusdam!
        </p>
      </div>
      <img data-aos="fade-right" data-aos-duration="1500" src="/imgs/grow.jpg" alt="Plant"
        class="shadow-xl rounded-2xl features__img" />

      <img data-aos="fade-right" data-aos-duration="1500" src="/imgs/card.jpg" alt="Credit card"
        class="shadow-xl rounded-2xl features__img" />
      <div data-aos="fade-left" data-aos-duration="1500" class="features__feature">
        <div class="features__icon">
          <i class="pi pi-credit-card" style="font-size: 2rem;"></i>
        </div>
        <h5 class="features__header">Free debit card included</h5>
        <p>
          Quasi, fugit in cumque cupiditate reprehenderit debitis animi enim
          eveniet consequatur odit quam quos possimus assumenda dicta fuga
          inventore ab.
        </p>
      </div>
    </div>
  </section>

  <section class="py-[10rem] border-t-2 section" id="section--2">
    <div data-aos="fade-up" data-aos-duration="1500" class="section__title">
      <h2 class="section__description">Operations</h2>
      <h3 class="section__header">
        Everything as simple as possible, but no simpler.
      </h3>
    </div>
    <Tabs data-aos="fade-up" data-aos-duration="1500" class="shadow-lg operations" value="0">
      <TabList class="rounded-xl text-xl">
        <Tab class="h-24 font-bold" value="0"><span
            class="bg-yellow-300 mr-5 p-2 rounded-full text-slate-900">01</span>Instant Transfers</Tab>
        <Tab value="1"><span class="bg-[#daf2e0] mr-5 p-2 rounded-full text-black">02</span>Instant Loans</Tab>
        <Tab value="2"><span class="bg-[#ffe3e4] mr-5 p-2 rounded-full text-black">03</span>Instant CLosing</Tab>
      </TabList>
      <TabPanels>
        <TabPanel value="0">
          <div class="operations__content--1 operations__content--active operations__content">
            <div class="operations__icon operations__icon--1">
              <i class="pi pi-rotate-180 pi-upload" style="font-size: 2rem;"></i>
            </div>
            <h5 class="operations__header">
              Tranfser money to anyone, instantly! No fees, no BS.
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
              ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat.
            </p>
          </div>
        </TabPanel>
        <TabPanel value="1">
          <div class="operations__content--1 operations__content--active operations__content">
            <div class="operations__icon operations__icon--2">
              <i class="pi pi-home pi-rotate-180" style="font-size: 2rem;"></i>
            </div>
            <h5 class="operations__header">
              Buy a home or make your dreams come true, with instant loans.
            </h5>
            <p>
              Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit
              anim id est laborum.
            </p>
          </div>
        </TabPanel>
        <TabPanel value="2">
          <div class="operations__content--3 operations__content--active operations__content">
            <div class="operations__icon operations__icon--3">
              <i class="pi pi-user" style="font-size:2rem;"></i>
            </div>
            <h5 class="operations__header">
              No longer need your account? No problem! Close it instantly.
            </h5>
            <p>
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum. Ut enim ad minim
              veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat.
            </p>
          </div>
        </TabPanel>
      </TabPanels>
    </Tabs>

  </section>

  <section data-aos="fade-up" data-aos-duration="1500" class="py-[10rem] border-t-2 section" id="section--3">
    <div data-aos="fade-up" data-aos-duration="1500" class="section__title section__title--testimonials">
      <h2 class="section__description">Not sure yet?</h2>
      <h3 class="section__header">
        Millions of Bankists are already making their lifes simpler.
      </h3>
    </div>
    <div class="flex justify-center items-center w-screen">
      <Carousel data-aos="fade-up" data-aos-duration="2000" :value="testimonals" :numVisible="1" class="w-[50%]"
        :numScroll="1" :responsiveOptions="responsiveOptions">
        <template #item="slotProps">
          <div class="mx-28 my-16 testimonial">

            <h5 class="testimonial__header">{{ slotProps.data.testimonal_summary }}</h5>
            <blockquote class="testimonial__text">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Accusantium quas quisquam non? Quas voluptate nulla minima
              deleniti optio ullam nesciunt, numquam corporis et asperiores
              laboriosam sunt, praesentium suscipit blanditiis. Necessitatibus
              id alias reiciendis, perferendis facere pariatur dolore veniam
              autem esse non voluptatem saepe provident nihil molestiae.
            </blockquote>
            <address class="testimonial__author">
              <img :src="slotProps.data.image" class="testimonial__photo" />
              <h6 class="testimonial__name">Aarav Lynn</h6>
              <p class="testimonial__location">San Francisco, USA</p>
            </address>

          </div>
        </template>
      </Carousel>
    </div>
    <!-- <div class="slider">
      <div class="slide slide--1">
        <div class="testimonial">
          <h5 class="testimonial__header">Best financial decision ever!</h5>
          <blockquote class="testimonial__text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Accusantium quas quisquam non? Quas voluptate nulla minima
            deleniti optio ullam nesciunt, numquam corporis et asperiores
            laboriosam sunt, praesentium suscipit blanditiis. Necessitatibus
            id alias reiciendis, perferendis facere pariatur dolore veniam
            autem esse non voluptatem saepe provident nihil molestiae.
          </blockquote>
          <address class="testimonial__author">
            <img src="img/user-1.jpg" alt="" class="testimonial__photo" />
            <h6 class="testimonial__name">Aarav Lynn</h6>
            <p class="testimonial__location">San Francisco, USA</p>
          </address>
        </div>
      </div>

      <div class="slide slide--2">
        <div class="testimonial">
          <h5 class="testimonial__header">
            The last step to becoming a complete minimalist
          </h5>
          <blockquote class="testimonial__text">
            Quisquam itaque deserunt ullam, quia ea repellendus provident,
            ducimus neque ipsam modi voluptatibus doloremque, corrupti
            laborum. Incidunt numquam perferendis veritatis neque repellendus.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo
            deserunt exercitationem deleniti.
          </blockquote>
          <address class="testimonial__author">
            <img src="img/user-2.jpg" alt="" class="testimonial__photo" />
            <h6 class="testimonial__name">Miyah Miles</h6>
            <p class="testimonial__location">London, UK</p>
          </address>
        </div>
      </div>

      <div class="slide slide--3">
        <div class="testimonial">
          <h5 class="testimonial__header">
            Finally free from old-school banks
          </h5>
          <blockquote class="testimonial__text">
            Debitis, nihil sit minus suscipit magni aperiam vel tenetur
            incidunt commodi architecto numquam omnis nulla autem,
            necessitatibus blanditiis modi similique quidem. Odio aliquam
            culpa dicta beatae quod maiores ipsa minus consequatur error sunt,
            deleniti saepe aliquid quos inventore sequi. Necessitatibus id
            alias reiciendis, perferendis facere.
          </blockquote>
          <address class="testimonial__author">
            <img src="img/user-3.jpg" alt="" class="testimonial__photo" />
            <h6 class="testimonial__name">Francisco Gomes</h6>
            <p class="testimonial__location">Lisbon, Portugal</p>
          </address>
        </div>
      </div>



    </div> -->
  </section>

  <section data-aos="fade-up" data-aos-duration="1500" class="py-[3rem] section section--sign-up">
    <div data-aos="fade-up" data-aos-duration="3000" class="section__title">
      <h3 class="section__header">
        The best day to join Bankist was one year ago. The second best is
        today!
      </h3>
    </div>
    <button class="btn--show-modal btn">Open your free account today!</button>
  </section>

  <footer class="footer">
    <ul class="footer__nav">
      <li class="footer__item">
        <a class="footer__link" href="#">About</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Pricing</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Terms of Use</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Privacy Policy</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Careers</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Blog</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Contact Us</a>
      </li>
    </ul>
    <img src="/imgs/icon.png" alt="Logo" class="footer__logo" />

  </footer>




</template>

































<!-- <div class="bg-[#f2f2f2] w-screen">
    <div class="flex justify-between items-center px-20 w-screen h-[100px]">
        <img src="/imgs/logo.png" alt="" class="h-[45px]">
        <div class="flex justify-between items-center space-x-10 font-bold text-xl">
            <Button label="Features" severity="secondary"  />
            <Button label="Operations" severity="secondary" />
            <Button label="Testimonals" severity="secondary"  />
            <Button label="Open account" severity="success" rounded />
        </div>

    </div>
</div> -->


<style>
/* The page is NOT responsive. You can implement responsiveness yourself if you wanna have some fun 😃 */

:root {
  --color-primary: #5ec576;
  --color-secondary: #ffcb03;
  --color-tertiary: #ff585f;
  --color-primary-darker: #4bbb7d;
  --color-secondary-darker: #ffbb00;
  --color-tertiary-darker: #fd424b;
  --color-primary-opacity: #5ec5763a;
  --color-secondary-opacity: #ffcd0331;
  --color-tertiary-opacity: #ff58602d;
  --gradient-primary: linear-gradient(to top left, #39b385, #9be15d);
  --gradient-secondary: linear-gradient(to top left, #ffb003, #ffcb03);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
}

body {

  font-family: 'Poppins', sans-serif;
  /* font-weight: 300;  */
  color: #292929;
  /* line-height: 1.9; */
  background-color: #f3f3f3;
}

/* GENERAL ELEMENTS */


.section--hidden {
  opacity: 0;
  transform: translateY(8rem);
}

.section__title {
  max-width: 80rem;
  margin: 0 auto 8rem auto;
}

.section__description {
  font-size: 1.8rem;
  font-weight: 600;
  text-transform: uppercase;
  color: var(--color-primary);
  margin-bottom: 1rem;
}

.section__header {
  font-size: 4rem;
  line-height: 1.3;
  font-weight: 500;
}

.btn {
  display: inline-block;
  background-color: var(--color-primary);
  font-size: 1.6rem;
  font-family: inherit;
  font-weight: 500;
  border: none;
  padding: 1.25rem 4.5rem;
  border-radius: 10rem;
  cursor: pointer;
  transition: all 0.3s;
}

.btn:hover {
  background-color: var(--color-primary-darker);
}

.btn--text {
  display: inline-block;
  background: none;
  font-size: 1.7rem;
  font-family: inherit;
  font-weight: 500;
  color: var(--color-primary);
  border: none;
  border-bottom: 1px solid currentColor;
  padding-bottom: 2px;
  cursor: pointer;
  transition: all 0.3s;
}

p {
  color: #666;
}

/* This is BAD for accessibility! Don't do in the real world! */
button:focus {
  outline: none;
}

img {
  transition: filter 0.5s;
}

.lazy-img {
  filter: blur(20px);
}

/* NAVIGATION */
.nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 9rem;
  width: 100%;
  padding: 0 6rem;
  z-index: 100;
}

/* nav and stickly class at the same time */
.nav.sticky {
  position: fixed;
  background-color: rgba(255, 255, 255, 0.95);
}

.nav__logo {
  height: 4.5rem;
  transition: all 0.3s;
}

.nav__links {
  display: flex;
  align-items: center;
  list-style: none;
}

.nav__item {
  margin-left: 4rem;
}

.nav__link:link,
.nav__link:visited {
  font-size: 1.7rem;
  font-weight: 400;
  color: inherit;
  text-decoration: none;
  display: block;
  transition: all 0.3s;
}

.nav__link--btn:link,
.nav__link--btn:visited {
  padding: 0.8rem 2.5rem;
  border-radius: 3rem;
  background-color: var(--color-primary);
  color: #222;
}

.nav__link--btn:hover,
.nav__link--btn:active {
  color: inherit;
  background-color: var(--color-primary-darker);
  color: #333;
}

/* HEADER */
.header {
  padding: 0 3rem;
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.header__title {
  flex: 1;

  max-width: 115rem;
  display: grid;
  grid-template-columns: 3fr 2fr;
  row-gap: 3rem;
  align-content: center;
  justify-content: center;

  align-items: start;
  justify-items: start;
}

h1 {
  font-size: 5.5rem;
  line-height: 1.35;
}

h4 {
  font-size: 2.4rem;
  font-weight: 500;
}

.header__img {
  width: 100%;
  grid-column: 2 / 3;
  grid-row: 1 / span 4;
  scale: 1.5;
  transform: translateY(-6rem);
}

.highlight {
  position: relative;
}

.highlight::after {
  display: block;
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: -1;
  opacity: 0.7;
  transform: scale(1.07, 1.05) skewX(-15deg);
  background-image: var(--gradient-primary);
}

/* FEATURES */
.features {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
  margin: 0 12rem;
}

.features__img {
  width: 100%;
}

.features__feature {
  align-self: center;
  justify-self: center;
  width: 70%;
  font-size: 1.5rem;
}

.features__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--color-primary-opacity);
  height: 5.5rem;
  width: 5.5rem;
  border-radius: 50%;
  margin-bottom: 2rem;
}

.features__icon svg {
  height: 2.5rem;
  width: 2.5rem;
  fill: var(--color-primary);
}

.features__header {
  font-size: 2rem;
  margin-bottom: 1rem;
}

/* OPERATIONS */
.operations {
  max-width: 100rem;
  margin: 12rem auto 0 auto;

  background-color: #fff;
}

.operations__tab-container {
  display: flex;
  justify-content: center;
}

.operations__tab {
  margin-right: 2.5rem;
  transform: translateY(-50%);
}

.operations__tab span {
  margin-right: 1rem;
  font-weight: 600;
  display: inline-block;
}

.operations__tab--1 {
  background-color: var(--color-secondary);
}

.operations__tab--1:hover {
  background-color: var(--color-secondary-darker);
}

.operations__tab--3 {
  background-color: var(--color-tertiary);
  margin: 0;
}

.operations__tab--3:hover {
  background-color: var(--color-tertiary-darker);
}

.operations__tab--active {
  transform: translateY(-66%);
}

.operations__content {
  display: none;

  /* JUST PRESENTATIONAL */
  font-size: 1.7rem;
  padding: 2.5rem 7rem 6.5rem 7rem;
}

.operations__content--active {
  display: grid;
  grid-template-columns: 7rem 1fr;
  column-gap: 3rem;
  row-gap: 0.5rem;
}

.operations__header {
  font-size: 2.25rem;
  font-weight: 500;
  align-self: center;
}

.operations__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 7rem;
  width: 7rem;
  border-radius: 50%;
}

.operations__icon svg {
  height: 2.75rem;
  width: 2.75rem;
}

.operations__content p {
  grid-column: 2;
}

.operations__icon--1 {
  background-color: var(--color-secondary-opacity);
}

.operations__icon--2 {
  background-color: var(--color-primary-opacity);
}

.operations__icon--3 {
  background-color: var(--color-tertiary-opacity);
}

.operations__icon--1 svg {
  fill: var(--color-secondary-darker);
}

.operations__icon--2 svg {
  fill: var(--color-primary);
}

.operations__icon--3 svg {
  fill: var(--color-tertiary);
}

/* SLIDER */
.slider {
  max-width: 100rem;
  height: 50rem;
  margin: 0 auto;
  position: relative;

  /* IN THE END */
  overflow: hidden;
}

.slide {
  position: absolute;
  top: 0;
  width: 100%;
  height: 50rem;

  display: flex;
  align-items: center;
  justify-content: center;

  /* THIS creates the animation! */
  transition: transform 1s;
}

.slide>img {
  /* Only for images that have different size than slide */
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.slider__btn {
  position: absolute;
  top: 50%;
  z-index: 10;

  border: none;
  background: rgba(255, 255, 255, 0.7);
  font-family: inherit;
  color: #333;
  border-radius: 50%;
  height: 5.5rem;
  width: 5.5rem;
  font-size: 3.25rem;
  cursor: pointer;
}

.slider__btn--left {
  left: 6%;
  transform: translate(-50%, -50%);
}

.slider__btn--right {
  right: 6%;
  transform: translate(50%, -50%);
}

.dots {
  position: absolute;
  bottom: 5%;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.dots__dot {
  border: none;
  background-color: #b9b9b9;
  opacity: 0.7;
  height: 1rem;
  width: 1rem;
  border-radius: 50%;
  margin-right: 1.75rem;
  cursor: pointer;
  transition: all 0.5s;

  /* Only necessary when overlying images */
  /* box-shadow: 0 0.6rem 1.5rem rgba(0, 0, 0, 0.7); */
}

.dots__dot:last-child {
  margin: 0;
}

.dots__dot--active {
  /* background-color: #fff; */
  background-color: #888;
  opacity: 1;
}

/* TESTIMONIALS */
.testimonial {
  width: 65%;
  position: relative;
}

.testimonial::before {
  content: '\201C';
  position: absolute;
  top: -5.7rem;
  left: -6.8rem;
  line-height: 1;
  font-size: 20rem;
  font-family: inherit;
  color: var(--color-primary);
  z-index: -1;
}

.testimonial__header {
  font-size: 2.25rem;
  font-weight: 500;
  margin-bottom: 1.5rem;
}

.testimonial__text {
  font-size: 1.7rem;
  margin-bottom: 3.5rem;
  color: #666;
}

.testimonial__author {
  margin-left: 3rem;
  font-style: normal;

  display: grid;
  grid-template-columns: 6.5rem 1fr;
  column-gap: 2rem;
}

.testimonial__photo {
  grid-row: 1 / span 2;
  width: 6.5rem;
  border-radius: 50%;
}

.testimonial__name {
  font-size: 1.7rem;
  font-weight: 500;
  align-self: end;
  margin: 0;
}

.testimonial__location {
  font-size: 1.5rem;
}

.section__title--testimonials {
  margin-bottom: 4rem;
}

/* SIGNUP */
.section--sign-up {
  background-color: #37383d;
  border-top: none;
  border-bottom: 1px solid #444;
  text-align: center;
  padding: 10rem 3rem;
}

.section--sign-up .section__header {
  color: #fff;
  text-align: center;
}

.section--sign-up .section__title {
  margin-bottom: 6rem;
}

.section--sign-up .btn {
  font-size: 1.9rem;
  padding: 2rem 5rem;
}

/* FOOTER */
.footer {
  padding: 10rem 3rem;
  background-color: #37383d;
}

.footer__nav {
  list-style: none;
  display: flex;
  justify-content: center;
  margin-bottom: 5rem;
}

.footer__item {
  margin-right: 4rem;
}

.footer__link {
  font-size: 1.6rem;
  color: #eee;
  text-decoration: none;
}

.footer__logo {
  height: 5rem;
  display: block;
  margin: 0 auto;
  margin-bottom: 5rem;
}

.footer__copyright {
  font-size: 1.4rem;
  color: #aaa;
  text-align: center;
}

.footer__copyright .footer__link {
  font-size: 1.4rem;
}

/* MODAL WINDOW */
.modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 60rem;
  background-color: #f3f3f3;
  padding: 5rem 6rem;
  box-shadow: 0 4rem 6rem rgba(0, 0, 0, 0.3);
  z-index: 1000;
  transition: all 0.5s;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
  z-index: 100;
  transition: all 0.5s;
}

.modal__header {
  font-size: 3.25rem;
  margin-bottom: 4.5rem;
  line-height: 1.5;
}

.modal__form {
  margin: 0 3rem;
  display: grid;
  grid-template-columns: 1fr 2fr;
  align-items: center;
  gap: 2.5rem;
}

.modal__form label {
  font-size: 1.7rem;
  font-weight: 500;
}

.modal__form input {
  font-size: 1.7rem;
  padding: 1rem 1.5rem;
  border: 1px solid #ddd;
  border-radius: 0.5rem;
}

.modal__form button {
  grid-column: 1 / span 2;
  justify-self: center;
  margin-top: 1rem;
}

.btn--close-modal {
  font-family: inherit;
  color: inherit;
  position: absolute;
  top: 0.5rem;
  right: 2rem;
  font-size: 4rem;
  cursor: pointer;
  border: none;
  background: none;
}

.hidden {
  visibility: hidden;
  opacity: 0;
}

/* COOKIE MESSAGE */
.cookie-message {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  width: 100%;
  background-color: white;
  color: #bbb;
  font-size: 1.5rem;
  font-weight: 400;
}

.p-tablist-tab-list {
  width: 100%;
  display: flex;
  justify-content: center;
  gap: 40px;
}
</style>