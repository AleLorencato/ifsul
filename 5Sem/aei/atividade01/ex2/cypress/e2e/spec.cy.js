Cypress.Commands.add('login', (email, senha) => {
  cy.visit('http://localhost:5173/login')
  cy.get('#email').type(email)
  cy.get('#senha').type(senha)
  cy.get('#entrar').click()
})

describe('Teste de login correto', () => {
  it('Deve logar com sucesso', () => {
    cy.login('joao@gmail.com', '12345')
    cy.url().should('include', '/dashboard')
  })
})

describe('Teste Atualização de dados do Perfil', () => {
  beforeEach(() => {
    cy.login('joao@gmail.com', '12345')
  })

  it('Deve atualizar o perfil com sucesso', () => {
    cy.get('#perfil').click()
    it('Deve redirecionar para a página de perfil', () => {
      cy.url().should('include', '/user')
      cy.contains('Perfil')
    })

    cy.intercept('POST', 'http://127.0.0.1:8000/api/users/*').as('updateUser')

    cy.get('#email').clear().type('joaozinho@gmail.com')
    cy.get('#senha').clear().type('12345')
    cy.get('#submit-btn').click()

    cy.wait('@updateUser').its('response.statusCode').should('eq', 200)
    cy.contains('Dados atualizados com sucesso!')
  })
})
describe('Teste Login Incorreto', () => {
  it('Deve mostrar erro ao fornecer credenciais erradas', () => {
    cy.login('email_incorreto@gmail.com', 'senha_errada')
    cy.contains('Erro no servidor: Email não cadastrado').should('be.visible')
  })
})
