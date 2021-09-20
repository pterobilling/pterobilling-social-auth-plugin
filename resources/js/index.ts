import { IPlugin, PluginStore } from 'react-pluggable'
import { PluginCustomRoute } from '@p/typings/index'
import DiscordCallback from './pages/DiscordCallback'

class SocialAuth implements IPlugin {
  public pluginStore!: PluginStore

  private namespace = 'SocialAuth'

  public getPluginName(): string {
    return `${this.namespace}@1.0.0`
  }

  public getDependencies(): string[] {
    return []
  }

  public init(pluginStore: PluginStore): void {
    this.pluginStore = pluginStore
  }

  public activate(): void {
    this.pluginStore.registerFunction(this, 'discord', `plugins:registerAuth`, () => {
      return {
        icon: 'fab fa-discord',
        text: 'Discord',
        url: '/api/social-auth/discord/redirect',
      }
    })
    this.pluginStore.registerFunction(this, 'github', `plugins:registerAuth`, () => {
      return {
        icon: 'fab fa-github',
        text: 'Github',
        url: '/api/social-auth/github/redirect',
      }
    })

    this.pluginStore.registerFunction(
      this,
      'discord',
      'plugins:custom-routes',
      (): PluginCustomRoute => {
        return {
          path: '/social-auth/discord/callback',
          exact: true,
          component: DiscordCallback,
        }
      }
    )
  }

  public deactivate(): void {
    this.pluginStore.forgotFunction(this, 'discord', `plugins:registerAuth`)
    this.pluginStore.forgotFunction(this, 'github', `plugins:registerAuth`)
    this.pluginStore.forgotFunction(this, 'discord', 'plugins:custom-routes')
  }
}

declare global {
  interface Window {
    SocialAuthPlugin: typeof SocialAuth
  }
}

window.SocialAuthPlugin = SocialAuth
