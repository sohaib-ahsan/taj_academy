window.jsPDF = window.jspdf.jsPDF;

function generatePDF() {
  const pdf = new jsPDF({
    unit: "in",
    format: [3.15, 5.6],
    orientation: "portrait",
  });

  function alignCenter(text, y) {
    const textWidth =
      (pdf.getStringUnitWidth(text) * pdf.internal.getFontSize()) /
      pdf.internal.scaleFactor;
    const x = (pdf.internal.pageSize.getWidth() - textWidth) / 2;
    pdf.text(text, x, y);
  }

  function alignTableContent(text) {
    const textWidth =
      (pdf.getStringUnitWidth(text) * pdf.internal.getFontSize()) /
      pdf.internal.scaleFactor;
    const x = (1.55 - textWidth) / 2;
    return x;
  }

  let img = new Image();
  img.src = "./logo.png";
  const pageWidth = pdf.internal.pageSize.getWidth();
  const imageWidth = 1;
  const imageCenter = (pageWidth - imageWidth) / 2;
  pdf.addImage(img, "PNG", imageCenter, 0.05, 1, 1, "", "FAST");
  pdf.setFontSize(12);
  pdf.setFont("helvetica", "bold");
  pdf.setTextColor(178, 45, 48);
  alignCenter("TAJ INSTITUTE OF INFORMATION", 1.3);
  alignCenter("TECHNOLOGY", 1.5);
  pdf.setFontSize(10);
  pdf.setTextColor(0, 0, 0);
  alignCenter("051-4474871", 1.73);
  alignCenter("tajinstitute.com.pk", 1.9);
  alignCenter("Office # 1, First Floor, Aman Plaza, Near", 2.07);
  alignCenter("Jahaz ground stop, khanna road, Rawalpindi", 2.24);
  pdf.text("Date: 21/09/23", 0.2, 2.46);
  pdf.text("Time: 05:39:11 PM", 1.8, 2.46);
  alignCenter("Bill No: 517", 2.65);

  const tableData = [
    ["Roll No", "3614"],
    ["Student Name", "Javid Iqbal"],
    ["Father Name", "Muhammad Iqbal"],
    ["Course", "Online DIT Computer Technology Course"],
    ["Fee Month", "September, 2023"],
    ["Course Fee", "24,000"],
    ["Monthly Received", "2,000"],
    ["Total Received", "21,000"],
    ["Total Balance", "3,000"],
  ];
  let y = 2.8;
  pdf.setLineWidth(0.01);
  tableData.forEach((row, i) => {
    if (i == 3) {
      if (pdf.getTextWidth(" " + row[1] + " ") < 1.55) {
        pdf.rect(0.125, y, 1.35, 0.22);
        pdf.rect(1.475, y, 1.55, 0.22);
        pdf.text(row[0], 0.2, y + 0.17);
        pdf.text(row[1], 1.55, y + 0.17);
        y += 0.22;
      } else {
        pdf.rect(0.125, y, 1.35, 0.38);
        pdf.rect(1.475, y, 1.55, 0.38);
        pdf.text(row[0], 0.2, y + 0.23);
        const words = row[1].split(" ");
        if (pdf.getTextWidth(" " + words.slice(0, 3).join(" ") + " ") > 1.55)
          index = 2;
        else index = 3;
        const firstWords = words.slice(0, index).join(" ");
        const remainingWords = words.slice(index).join(" ");
        pdf.text(firstWords, 1.475 + alignTableContent(firstWords), y + 0.15);
        pdf.text(
          remainingWords,
          1.475 + alignTableContent(remainingWords),
          y + 0.32
        );
        y += 0.38;
      }
    } else {
      pdf.rect(0.125, y, 1.35, 0.22);
      pdf.rect(1.475, y, 1.55, 0.22);
      pdf.text(row[0], 0.2, y + 0.17);
      pdf.text(row[1], 1.55, y + 0.17);
      y += 0.22;
    }
  });
  pdf.setFontSize(12);
  alignCenter("Thank You", y + 0.3);
  pdf.setTextColor(178, 45, 48);
  pdf.setFontSize(10);
  alignCenter("POWERED BY TAJ INSTITUTE", y + 0.5);
  pdf.save("invoice.pdf");
}
