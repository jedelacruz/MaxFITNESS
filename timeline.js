document.addEventListener("DOMContentLoaded", () => {
  let customers = 0, equipment = 0;
  const customersEl = document.getElementById("customers");
  const equipmentEl = document.getElementById("equipment");

  const interval = setInterval(() => {
    if (customers < 10000) {
      customers += 200;
      customersEl.textContent = customers.toLocaleString();
    }
    if (equipment < 10000) {
      equipment += 200;
      equipmentEl.textContent = equipment.toLocaleString();
    }
    if (customers >= 10000 && equipment >= 10000) {
      clearInterval(interval);
      customersEl.textContent = "10K+";
      equipmentEl.textContent = "10K+";
    }
  }, 50);
});