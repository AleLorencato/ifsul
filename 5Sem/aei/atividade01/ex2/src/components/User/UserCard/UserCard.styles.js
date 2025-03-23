import styled from 'styled-components'

export const UserCardContainer = styled.div`
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px #ccc;
  width: 450px;
  height: 615px;
  max-width: 98vw;
  max-height: 98vh;
  background-color: white;
  .picture {
    width: 100%;
    display: flex;
    justify-content: center;
    img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }
  }
  h2 {
    margin: 10px 0;
    color: black;
  }
  p {
    margin: 5px 0;
    color: black;
  }
  input {
    padding: 5px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-color: rgb(209 213 219 / var(--tw-border-opacity));
    background-color: rgb(31 41 55 / var(--tw-bg-opacity));
    border-radius: 5px;
    color: black;
  }
`
export const CenteredContainer = styled.div`
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
`
