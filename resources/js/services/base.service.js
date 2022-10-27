import { Http } from '@/services/http.init'

export class BaseService {
  static request (status = { auth: false }) {
    return new Http(status)
  }
}
