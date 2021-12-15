require 'semantic'

module Jekyll
  module SortFilter
    def semver_sort_by(input, property = nil)
      Array(input).sort do |a,b|
        Semantic::Version.new(a[property]) <=> Semantic::Version.new(b[property])
      end
    end

    def semver_sort(hosts)
      Array(hosts).sort do |a,b|

        a81 = a['versions'][81] && a['versions'][81]['semver'] ? Semantic::Version.new(a['versions'][81]['semver']) : '0.0.1'
        a80 = a['versions'][80] && a['versions'][80]['semver'] ? Semantic::Version.new(a['versions'][80]['semver']) : '0.0.1'
        a74 = a['versions'][74] && a['versions'][74]['semver'] ? Semantic::Version.new(a['versions'][74]['semver']) : '0.0.1'
        a73 = a['versions'][73] && a['versions'][73]['semver'] ? Semantic::Version.new(a['versions'][73]['semver']) : '0.0.1'
        a72 = a['versions'][72] && a['versions'][72]['semver'] ? Semantic::Version.new(a['versions'][72]['semver']) : '0.0.1'
        a71 = a['versions'][71] && a['versions'][71]['semver'] ? Semantic::Version.new(a['versions'][71]['semver']) : '0.0.1'
        a70 = a['versions'][70] && a['versions'][70]['semver'] ? Semantic::Version.new(a['versions'][70]['semver']) : '0.0.1'
        a56 = a['versions'][56] && a['versions'][56]['semver'] ? Semantic::Version.new(a['versions'][56]['semver']) : '0.0.1'
        a55 = a['versions'][55] && a['versions'][55]['semver'] ? Semantic::Version.new(a['versions'][55]['semver']) : '0.0.1'
        a54 = a['versions'][54] && a['versions'][54]['semver'] ? Semantic::Version.new(a['versions'][54]['semver']) : '0.0.1'
        adefault = a['default'] ? a['default'].to_i : 0

        b81 = b['versions'][81] && b['versions'][81]['semver'] ? Semantic::Version.new(b['versions'][81]['semver']) : '0.0.1'
        b80 = b['versions'][80] && b['versions'][80]['semver'] ? Semantic::Version.new(b['versions'][80]['semver']) : '0.0.1'
        b74 = b['versions'][74] && b['versions'][74]['semver'] ? Semantic::Version.new(b['versions'][74]['semver']) : '0.0.1'
        b73 = b['versions'][73] && b['versions'][73]['semver'] ? Semantic::Version.new(b['versions'][73]['semver']) : '0.0.1'
        b72 = b['versions'][72] && b['versions'][72]['semver'] ? Semantic::Version.new(b['versions'][72]['semver']) : '0.0.1'
        b71 = b['versions'][71] && b['versions'][71]['semver'] ? Semantic::Version.new(b['versions'][71]['semver']) : '0.0.1'
        b70 = b['versions'][70] && b['versions'][70]['semver'] ? Semantic::Version.new(b['versions'][70]['semver']) : '0.0.1'
        b56 = b['versions'][56] && b['versions'][56]['semver'] ? Semantic::Version.new(b['versions'][56]['semver']) : '0.0.1'
        b55 = b['versions'][55] && b['versions'][55]['semver'] ? Semantic::Version.new(b['versions'][55]['semver']) : '0.0.1'
        b54 = b['versions'][54] && b['versions'][54]['semver'] ? Semantic::Version.new(b['versions'][54]['semver']) : '0.0.1'
        bdefault = b['default'] ? b['default'].to_i : 0

        [b81, b80, b74, b73, b72, b71, bdefault, b70, b56, b55, b54] <=> [a81, a80, a74, a73, a72, a71, adefault, a70, a56, a55, a54]
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
