describe('template spec', () => {
    it('can add an item to the basket', () => {
      cy.visit('http://localhost/codespace/mktime/root/login.php');
      cy.get('#email').type("johndoe@example.com");
      cy.get('#password').type("password123");
      cy.get('#submit_button').click();
      cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
      })

    it('can continue shopping', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="index.php"]').click();
        cy.url().should('include', 'index.php')
    })
    
    it('can go to basket', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="cart.php"]').click();
        cy.url().should('include', 'cart.php')
    })

    it('can increase the quantity in the basket', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="cart.php"]').click();
        cy.get('#increment').click(); 
        cy.get('#qty-input').invoke('val').should('eq', '2');
    })

    it('can decrease the quantity in the basket', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="cart.php"]').click();
        cy.get('#increment').click(); 
        cy.get('#decrement').click(); 
        cy.get('#qty-input').invoke('val').should('eq', '1');
    })

    it('can remove the item in the basket', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="cart.php"]').click();
        cy.get('#remove').click();
        cy.get('#qty-input').invoke('val').should('eq', '0');
    })

    it('can go to checkout', () => {
        cy.visit('http://localhost/codespace/mktime/root/login.php');
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('.card-footer.text-muted a[href^="added.php?id="]').first().click();
        cy.get('.alert.alert-secondary a[href^="cart.php"]').click();
        cy.get('a.btn.btn-dark.btn-block[href="checkout.php"]').click();
        cy.url().should('include', 'checkout.php');
        cy.get('.card-body').contains('Thank you for your purchase!');
    })

})
    