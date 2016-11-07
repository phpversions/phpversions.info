module Jekyll
  module FormatVersionFilter
    def format_version(info)
      return "-" if not info

      return info['semver'] if info['semver'] == info['version']

      return '<abbr title="%s">%s</abbr>' % [info['version'], info['semver']]
    end
  end
end

Liquid::Template.register_filter(Jekyll::FormatVersionFilter)
