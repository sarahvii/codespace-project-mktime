// Utilise assert module
const assert = require('assert');
// Pull functionality of selenium-webdriver module
const {Builder, By} = require('selenium-webdriver');

// Create loginTest function
async function loginTest (){

// open the browser
let driver = await new Builder().forBrowser("chrome").build();

// Navigate to URl which components will be tested
driver.get("http://localhost/mktime/root/login.php");

// Maximise the brower for a clear picture of the test cases executes
await driver.manage().window().maximize();

// Test using correct login details
// Input correct user name 'john doe'
await driver.findElement(By.id("email")).sendKeys("johndoe@example.com");

// Input correct password password123
await driver.findElement(By.id("password")).sendKeys("password123");

// Click on 'login' button
await driver.findElement(By.id("submit_button")).click();

// Wait for the page to load and assert the expcted URL
await driver.wait(async function() { 
    const currentURL = await driver.getCurrentUrl();
    assert.strictEqual(currentURL, "http://localhost/mktime/root/index.php");
    return true;
});

// End session - logout
await driver.findElement(By.css('a[href="logout.php"]')).click();

// Close the browser
await driver.quit();
}
 
loginTest()