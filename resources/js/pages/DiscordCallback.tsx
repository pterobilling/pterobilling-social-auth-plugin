import React from 'react'
import Card from '@p/component/Card'
import { I18nextProviderProps, withTranslation } from 'react-i18next'
import { RouteComponentProps, withRouter } from 'react-router-dom'
import API from '@p/utils/API'

type DiscordCallbackProps = I18nextProviderProps & RouteComponentProps

class DiscordCallback extends React.Component<DiscordCallbackProps> {
  public async componentDidMount(): Promise<void> {
    const queries = new URLSearchParams(this.props.location.search)
    const code = queries.get('code')
    const state = queries.get('state')

    if (code && state) {
      try {
        const response = await API.get('/api/social-auth/discord/callback')
        console.log(response)
      } catch (error) {
        console.error(error)
      }
    } else {
      this.props.history.push('/')
    }
  }

  public render(): JSX.Element {
    const i18n = this.props.i18n

    return (
      <div id="socialauth-discord">
        <Card>
          <Card.Header>
            <Card.Title>{i18n.t('modal.loading')}</Card.Title>
          </Card.Header>
          <Card.Body>
            <Card.Text></Card.Text>
          </Card.Body>
        </Card>
      </div>
    )
  }
}

export default (): React.ComponentType => {
  return withTranslation('socialAuth')(withRouter(DiscordCallback))
}
