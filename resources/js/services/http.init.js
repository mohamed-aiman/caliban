import axios from 'axios'

export class Http {
  constructor (status) {

    this.instance = axios.create({
      baseURL: 'http://shop.local:10087'
    })

    // Add a request interceptor
    this.instance.interceptors.request.use(function (config) {
      console.log('inside request interceptor')
        window.progressBar.start()
        // Do something before request is sent
        return config;
      }, function (error) {
        // Do something with request error
        return Promise.reject(error);
      });

    // Add a response interceptor
    this.instance.interceptors.response.use(function (response) {
        console.log('inside response interceptor')
        window.progressBar.finish()
        // Any status code that lie within the range of 2xx cause this function to trigger
        // Do something with response data
        return response;
      }, function (error) {
        // Any status codes that falls outside the range of 2xx cause this function to trigger
        // Do something with response error
        return Promise.reject(error);
      });


    return this.init()
  }

  init () {
    //TODO: commented for development.need to uncomment this if want to use auth
    // if (this.isAuth) {
    //   this.instance.interceptors.request.use(request => {
    //     request.headers.authorization = AuthService.getBearer()
    //     // if access token expired and refreshToken is exist >> go to API and get new access token
    //     if (AuthService.isAccessTokenExpired() && AuthService.hasRefreshToken()) {
    //       return AuthService.debounceRefreshTokens()
    //         .then(response => {
    //           AuthService.setBearer(response.data.accessToken)
    //           request.headers.authorization = AuthService.getBearer()
    //           return request
    //         }).catch(error => Promise.reject(error))
    //     } else {
    //       return request
    //     }
    //   }, error => {
    //     return Promise.reject(error)
    //   })
    // }

    return this.instance
  }
}
