import { BaseService } from '@/services/base.service'
import { ErrorWrapper, ResponseWrapper } from '@/services/util'

export class LocationService extends BaseService {
 
  static async forSelect (query) {
    try {
      const url = (query) ? `/locations/for-select?search=${query}` : `/locations/for-select`;
      const response = await this.request({ auth: false }).get(url)
      return new ResponseWrapper(response, response.data)
    } catch (error) {
      const message = error.response.data ? error.response.data.error : error.response.statusText
      throw new ErrorWrapper(error, message)
    }
  }

}
