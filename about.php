<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - MAXFITNESS</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    
.about{
  padding: 0px 20px;
  display: flex;
  flex-direction: column;
  padding: 3rem;
}

.mission-vision{
  display: flex;
  justify-content: space-between;
  margin-bottom: 3rem;
  gap: 3rem;
}

.mission-box, .vision-box{
  
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.mission-box h3, .vision-box h3, .team-history h3{
  font-size: 1.5rem;
  color: #333;
}
.mission-box p, .vision-box p, .team-history p{
  font-size: 1rem;
  color: #555;
  line-height: 1.5; 
}

.team-history{
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.page-header{
  display: flex;
  flex-direction: column;
  padding: 15rem 20px;
  background-image: linear-gradient(rgba(21, 41, 66, 0.7), rgba(21, 41, 66, 0.7)), url('https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
  background-position: center;
}

@media (max-width: 768px) {
  .mission-vision {
    flex-direction: column;
    gap: 1.5rem; /* Adjusted gap for stacked layout */
  }
}

  </style>
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <header class="page-header">
    <h1>About MAXFITNESS</h1>
    <p>Quality Gear, Stronger Results</p>
  </header>

  <section class="about">
    <div class="mission-vision">
      <div class="mission-box">
        <h3>Our Mission Statement</h3>
        <p>MaxFitness Co. is committed to providing top-quality, durable, and innovative gym equipment that meets the
          needs of fitness centers, home users, and wellness professionals. We aim to support our clients in building
          strong, effective training environments that inspire healthier living.
        </p>
      </div>

      <div class="vision-box">
        <h3>Our Vision Statement</h3>
        <p>At MaxFitness Co., our vision is to become the leading gym equipment provider in the Philippines and
          beyond—known for excellence, customer satisfaction, and advancing the fitness industry through reliable
          products
          and outstanding service.
        </p>
      </div>

    </div>

    <div class="team-history">
      <h3>Company History – MaxFitness Co.</h3>
      <p>Established in 2020, MaxFitness Co. was created in response to the growing demand for high-quality fitness
        equipment in the Philippines. As more Filipinos embraced healthier lifestyles and home workouts became more
        common, our founders—driven by a shared passion for fitness and entrepreneurship—saw an opportunity to make
        reliable gym equipment more accessible to everyone.
        We started small, operating out of a modest warehouse with a simple online setup. But with a strong focus on
        quality, affordability, and customer satisfaction, we quickly gained the trust of our customers. Our product
        line steadily expanded to include a wide range of essentials—treadmills, stationary bikes, benches, cable
        machines, and more—all carefully chosen to meet the unique needs of the local market.
        As MaxFitness Co. continued to grow, so did our commitment to excellence. Today, we proudly serve fitness
        centers, schools, corporate gyms, and home fitness enthusiasts across the country. Through consistent innovation
        and dependable service, we've earned our place as one of the trusted names in the Philippine fitness equipment
        industry.
      </p>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

</body>

</html>