import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class UserService extends BaseService {

  static async logout () {
    try {
      const response = await this.request({ auth: true }).post(`/logout`)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
