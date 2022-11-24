import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class ProductService extends BaseService {

  static async queryProducts (params, url) {
    try {
      // const url = '/api/search?q=' + query.value + '&category=' + store.state.category.selectedCategory.slug
      url = url || '/api/search?';
      const searchParams = new URLSearchParams(params);
      url += searchParams.toString();
      console.log('url', url);


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

  static async toggleIsActive (productId) {
    try {
      const response = await this.request({ auth: false }).patch(`/api/listings/is-active-toggle`, {
        product_id: productId
      })
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async decrementQuantity (productId) {
    try {
      const response = await this.request({ auth: false }).patch(`/api/listings/decrement-quantity`, {
        product_id: productId
      })
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async incrementQuantity (productId) {
    try {
      const response = await this.request({ auth: false }).patch(`/api/listings/increment-quantity`, {
        product_id: productId
      })
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async updateQuantity (payload) {
    try {
      const response = await this.request({ auth: false }).patch(`/api/listings/update-quantity`, payload)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async updatePrice (payload) {
    try {
      const response = await this.request({ auth: false }).patch(`/api/listings/update-price`, payload)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
