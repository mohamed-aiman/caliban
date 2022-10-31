import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class CategoryService extends BaseService {

  static async parents (id) {
    try {
      const response = await this.request({ auth: false }).get(`/categories/${id}`)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }
    
  static async parents (type) {
    try {
      const url = (type) ? `/api/parent-categories?type=${type}` : `/api/parent-categories`
      const response = await this.request({ auth: false }).get(url)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

  static async children (id) {
    try {
      const response = await this.request({ auth: false }).get(`/categories/${id}/children`)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }
  
  static async levels (id) {
    try {
      const response = await this.request({ auth: false }).get(`/categories/${id}/levels`)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }
  
  static async forSelect (query) {
    try {
      const url = (query) ? `/categories/for-select?search=${query}` : `/categories/for-select`;
      const response = await this.request({ auth: false }).get(url)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
