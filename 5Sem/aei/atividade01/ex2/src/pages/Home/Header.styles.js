import styled from 'styled-components'
import { Link } from 'react-router-dom'

export const NavLink = styled(Link)`
  position: relative;
  color: black;
  transition: color 0.3s ease;

  &::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    display: block;
    margin-top: 5px;
    right: 0;
    background: #10b981;
    transition: width 0.3s ease;
  }

  &:hover {
    color: #10b981;
  }

  &:hover::after {
    width: 100%;
    left: 0;
    background: #10b981;
  }
`
