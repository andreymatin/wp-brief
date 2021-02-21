window.addEventListener("DOMContentLoaded", (event) => {
  /**
   * Convert Markdown Text
   */
  const wpbLog = document.querySelector("#wpbChangelog");
  const wpbDocs = document.querySelector("#wpbDocs");

  if (wpbLog && wpbDocs) {
    const wpbLogText = wpbLog.querySelector(".wpb-tabs-card__content");
    const wpbDocsText = wpbDocs.querySelector(".wpb-tabs-card__content");

    const converter = new showdown.Converter();

    let text = wpbLogText.innerHTML;
    let html = converter.makeHtml(text);
    wpbLogText.innerHTML = html;

    text = wpbDocsText.innerHTML;
    html = converter.makeHtml(text);
    wpbDocsText.innerHTML = html;
  }

  /**
   * Tabs
   */
  const wbpTabs = document.querySelectorAll(".wpb-tabs-links");
  if (wbpTabs) {
    wbpTabs.forEach((el) => {
      el.addEventListener("click", (e) => {
        e.preventDefault();
        const target = e.currentTarget;

        // Active Tabs
        wbpTabs.forEach((el) => {
          el.classList.remove("active");
        });

        target.classList.add("active");

        const hash = target.hash;
        const tab = document.querySelector(hash);

        if (tab) {
          const tabs = document.querySelectorAll(".wpb-tabs-card");
          tabs.forEach((el) => {
            el.classList.remove("active");
          });

          tab.classList.add("active");
        }
      });
    });
  }

  /**
   * Expand
   */
  const wpbExpand = document.querySelector(".wpb-expand");
  if (wpbExpand) {
    wpbExpand.addEventListener("click", (e) => {
      e.preventDefault();
      e.currentTarget.classList.add('hide');

      const wpbTabsContent = document.querySelectorAll(
        ".wpb-tabs-card__content"
      );

      if (wpbTabsContent) {
        wpbTabsContent.forEach((el) => {
          el.classList.add("expand");
        });
      }
    });
  }
});
