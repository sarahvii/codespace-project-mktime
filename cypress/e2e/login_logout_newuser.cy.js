describe('template spec', () => {
  it('can go to the home page', () => {
    cy.visit('http://localhost/codespace/mktime/root/index.php')
    })
  

  it('can go to the login page', () => {
    cy.visit('http://localhost/codespace/mktime/root/index.php');
	  cy.get('a[href="login.php"]').click();
	  })


  it('can log a user in', () => {
    cy.visit('http://localhost/codespace/mktime/root/index.php');
    cy.get('a[href="login.php"]').click();
    cy.get('#email').type("johndoe@example.com");
    cy.get('#password').type("password123");
    cy.get('#submit_button').click()
    })


  it('can go to the create account page', () => {
    cy.visit('http://localhost/codespace/mktime/root/index.php');
	  cy.get('a[href="create_account.php"]').click();
	  }) 
    
  
  it('will not let users create an account with the same email address twice', () => {
    cy.visit('http://localhost/codespace/mktime/root/index.php');
    cy.get('a[href="create_account.php"]').click();
    cy.get('#firstname').type("John");
    cy.get('#lastname').type("Doe");
    cy.get('#email').type("johndoe@example.com");
    cy.get('#pass1').type("mags123");
    cy.get('#pass2').type("mags123");
    cy.get('#create-account').click();
    cy.get('.alert.alert-secondary').should('exist');
    cy.get('.alert.alert-secondary').contains('Email address already registered').should('exist');
    cy.get('.close').click();
    cy.get('.alert.alert-secondary').should('not.exist');
      })

  it('checks passwords are the same', () => {
      cy.visit('http://localhost/codespace/mktime/root/index.php');
    cy.get('a[href="create_account.php"]').click();
    cy.get('#firstname').type("Sally");
    cy.get('#lastname').type("Magnusson");
    cy.get('#email').type("salmags@example.com");
    cy.get('#pass1').type("mags123");
    cy.get('#pass2').type("notmags123");
    cy.get('#create-account').click();
    cy.get('.alert.alert-secondary').should('exist');
    cy.get('.alert.alert-secondary').contains('Passwords do not match').should('exist');
    cy.get('.close').click();
    cy.get('.alert.alert-secondary').should('not.exist');
      })

  it('can create an account and sign in', () => {
      cy.visit('http://localhost/codespace/mktime/root/index.php');
    cy.get('a[href="create_account.php"]').click();
    cy.get('#firstname').type("Sally");
    cy.get('#lastname').type("Magnusson");
    cy.get('#email').type("salmags@example.com");
    cy.get('#pass1').type("mags123");
    cy.get('#pass2').type("mags123");
    cy.get('#create-account').click();
    cy.get('.already-have-account a[href="login.php"]').click();
    cy.get('#email').type("salmags@example.com");
    cy.get('#password').type("mags123");
    cy.get('#submit_button').click()
      })

      it('can log a user out', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.get('a[href="login.php"]').click();
        cy.get('#email').type("johndoe@example.com");
        cy.get('#password').type("password123");
        cy.get('#submit_button').click();
        cy.get('a[href="logout.php"]').click();
        cy.wait(500);
      cy.on('window:alert', (message) => {
        expect(message).to.equal('You have successfully logged out.'); // 
        cy.on('window:confirm', () => true); 
        cy.get('OK').click()
      });
      
      })
})