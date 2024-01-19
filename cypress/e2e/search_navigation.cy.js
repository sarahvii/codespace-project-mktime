describe('template spec', () => {
    it('can search for products', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.get('#search-text').type("hiddleston");
        cy.get('#submit-search').click();
        cy.get('.row').contains('Gold');
      })

      it('can clear a search', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.get('#search-text').type("hiddleston");
        cy.get('#submit-search').click();
        cy.get('.row').contains('Gold');
        cy.get('.search-form form a[href="index.php"]').click();
      })

      it('can get the details page for a product', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.get('.card-footer.text-muted a[href^="product_details.php?id="]').first().click();
      })

      it('can sign up to the mailing list', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.window().then((win) => {
          cy.stub(win, 'alert').as('alertStub');
        });
        cy.get('#form5Example2').type("salmags@example.com");
        cy.get('#newsletter-submit').click();
        cy.get('@alertStub').should('be.calledWith', 'You have successfully signed up to our mailing list. Please check your inbox.');
      })

      it('will reject text that is not email formatted', () => {
        cy.visit('http://localhost/codespace/mktime/root/index.php');
        cy.window().then((win) => {
          cy.stub(win, 'alert').as('alertStub');
        });
        cy.get('#form5Example2').type("salmags");
        cy.get('#newsletter-submit').click();
        cy.get('@alertStub').should('be.calledWith', 'Please enter a valid email address.');
      })

      it('can ask for a new password', () => {
        cy.visit('http://localhost/codespace/mktime/root/forgot_password.php');
        cy.window().then((win) => {
          cy.stub(win, 'alert').as('alertStub');
        });
        cy.get('#email-address').type("salmags@example.com");
        cy.get('#password-reset').click();
        cy.get('@alertStub').should('be.calledWith', "Please check your inbox for reset instructions.");
      })

     it('will not accept a password reset request without an email formatted string', () => {
        cy.visit('http://localhost/codespace/mktime/root/forgot_password.php');
        cy.window().then((win) => {
          cy.stub(win, 'alert').as('alertStub');
        });
        cy.get('#email-address').type("salmags");
        cy.get('#password-reset').click();
        cy.get('@alertStub').should('be.calledWith', 'Please enter a valid email address.');
      })

     })
    