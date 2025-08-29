<?php include_once 'includes/_header.php'; ?>

<body class="text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-900">
  <main class="grid lg:grid-cols-[25%_75%] xl:grid-cols-[20%_80%]">
    <!-- Sidebar -->
    <div class="sidebar">
      <?php include_once 'includes/_sidebar.php' ?>
    </div>
    <!-- Main content -->
    <div class="content">
      <section class="hero w-full h-screen" id="hero">
        <?php include_once 'includes/content/_hero.php'  ?>
      </section>
      <section class="bio w-full h-auto mb-40" id="bio">
        <?php include_once 'includes/content/_bio.php'  ?>
      </section>
      <section class="my-skills w-full h-auto mb-40" id="mySkills">
        <?php include_once 'includes/content/_my_skills.php'  ?>
      </section>
      <section class="education w-full h-auto mb-40" id="education">
        <?php include_once 'includes/content/_education.php'  ?>
      </section>
      <section class="experience w-full h-auto mb-40" id="experience">
        <?php include_once 'includes/content/_experience.php'  ?>
      </section>
      <section class="my-works w-full h-auto mb-40" id="myWorks">
        <?php include_once 'includes/content/_my_works.php'  ?>
      </section>
      <section class="blog w-full h-auto mb-40" id="blog">
        <?php include_once 'includes/content/_blog.php'  ?>
      </section>
      <section class="contact-me w-full h-auto mb-40" id="contactMe">
        <?php include_once 'includes/content/_contact_me.php'  ?>
      </section>
      <!-- Back to top button -->
      <button
        id="backToTop"
        class="hidden z-10 fixed bottom-8 right-4 p-4 bg-capri hover:bg-capri-light transition ease-in-out delay-75 duration-300 rounded-full"
        aria-label="Back to top">
        <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
          <path d="M12 17V13" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M2 8L11.7317 3.13416C11.9006 3.04971 12.0994 3.0497 12.2683 3.13416L22 8" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          <path d="M20 11V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V11" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </button>
    </div>
  </main>
  <?php include_once 'includes/_footer.php'; ?>