require 'semantic'

module Jekyll
  module SortFilter
    def semver_sort_by(input, property = nil)
      Array(input).sort do |a,b|
        Semantic::Version.new(a[property]) <=> Semantic::Version.new(b[property])
      end
    end

    def sort_and_filter_final_only(input, property = nil)
      Array(input)
        .select { |i| i[property].is_a? ::Integer }
        .sort_by { |x| x[property] }
    end

    def sort_and_filter_dev_only(input, property = nil)
      Array(input)
        .select { |i| i[property].is_a? ::String }
        .sort_by { |x| x[property] }
    end

    def is_inty?(version)
       !!(version =~ /\A[-+]?[0-9]+\z/)
    end
  end
end

Liquid::Template.register_filter(Jekyll::SortFilter)
