require 'semantic'

module Jekyll
  module SortFilter
    def semver_sort_by(input, property = nil)
      Array(input).sort do |a,b|
        Semantic::Version.new(a[property]) <=> Semantic::Version.new(b[property])
      end
    end

    def filter_final_only(input, property = nil)
      Array(input).select { |i| i[property].is_a? ::Integer }
    end

    def filter_dev_only(input, property = nil)
      Array(input).select { |i| i[property].is_a? ::String }
    end

    def is_inty?(version)
       !!(version =~ /\A[-+]?[0-9]+\z/)
    end
  end
end

Liquid::Template.register_filter(Jekyll::SortFilter)
