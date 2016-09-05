module.exports = {
  entry: __dirname + '/frontend/main.js',
  output: {
    path: __dirname + '/public/assets/js',
    filename: 'bundle.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
        query:{
          presets: ['es2015']
        }
      },
      { test: /\.vue$/, loader: 'vue' }
    ]
  }
}
