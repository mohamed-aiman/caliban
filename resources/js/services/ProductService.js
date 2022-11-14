import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class ProductService extends BaseService {

  static async queryProducts (params, url) {
    console.log('queryProducts', params);
    try {
      // const url = '/api/search?q=' + query.value + '&category=' + store.state.category.selectedCategory.slug
      url = url || '/api/search?';
      console.log('url', url);
      const searchParams = new URLSearchParams(params);
      console.log('searchParams', searchParams);
      url += searchParams.toString();
      console.log('url2', url);


      const response = await this.request({ auth: false }).get(url)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async loadProducts (page) {
    try {
      const response = await this.request({ auth: false }).get(page)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async loadWatchlist (page) {
    try {
      const response = await this.request({ auth: true }).get(page)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async loadProduct (slug) {
    try {
      const response = await this.request({ auth: false }).get(`/api/products/${slug}`)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async toggleLike (productId) {
    try {
      const response = await this.request({ auth: false }).post(`/api/likes/toggle`, {
        product_id: productId
      })
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
