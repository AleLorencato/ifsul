import { Component } from 'react';

const _user = {
  name: 'Ada',
  imageUrl:
    'https://upload.wikimedia.org/wikipedia/commons/0/0f/Ada_lovelace.jpg',
  imageSize: 100,
};

export default class AdaClass extends Component {
  state = {
    user: _user,
    countRender: 1,
  };

  componentDidMount() {
    console.log(this.state.countRender, 'render');
  }

  componentDidUpdate(prevProps, prevState) {
    if (this.state.user !== prevState.user) {
      console.log(this.state.countRender, 'render');
    }
  }

  componentWillUnmount() {
    console.log('Ada será removida!!');
  }

  changeAda = () => {
    this.state.user.name = 'Ada Lovalace';
    this.state.user.imageSize = 200;
    this.setState({
      user: { ...this.state.user },
      countRender: this.state.countRender + 1,
    });
  };

  render() {
    return (
      <>
        <a href="https://pt.wikipedia.org/wiki/Ada_Lovelace" target="_blank">
          <img
            className="avatar"
            src={this.state.user.imageUrl}
            alt={'Photo of ' + this.state.user.name}
            style={{
              width: this.state.user.imageSize,
            }}
            onClick={this.changeAda}
          />
        </a>
        <h1>{this.state.user.name}</h1>
      </>
    );
  }
}
