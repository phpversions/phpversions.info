require 'semantic'

module Jekyll
  module SortFilter
    def semver_sort_by(input, property = nil)
      ary = [input].flatten
      ary.sort {|a,b| Semantic::Version.new(a[property]) <=> Semantic::Version.new(b[property]) }
    end
  end
end

Liquid::Template.register_filter(Jekyll::SortFilter)
