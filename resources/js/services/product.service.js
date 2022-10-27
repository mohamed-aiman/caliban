import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class ProductService extends BaseService {

  static async loadProducts (page) {
    try {
      const response = await this.request({ auth: true }).get(page)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
