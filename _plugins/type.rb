module Jekyll
  module TypeFilter
    def filter_by_type(input, type)
      Array(input).select do |host|
        host['type'] == type
      end
    end
  end
end

Liquid::Template.register_filter(Jekyll::TypeFilter)
