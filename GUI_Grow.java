import java.awt.Color;
import java.awt.Graphics;
import java.awt.GridLayout;
import java.awt.Point;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.Vector;
import javax.swing.JButton;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.filechooser.FileNameExtensionFilter;

// 1.도형을 저장시킬 객체를 정의한다. (class)
// 2.도형을 그릴 때마다 클래스 객체를 찍어 배열에 저장시킨다.
class Shape implements Serializable {

	// 생성자 안 값을 다 저장???
	int StartX, StartY;
	int Shape;

	// 3가지 도형이 모두 받아 와야하는 값을 부모 생성자에 정의한다.
	Shape(int argshap, int argX, int argY) {
		this.StartX = argX;
		this.StartY = argY;
		this.Shape = argshap;
	}
}

class Line extends Shape {
	int EndX, EndY;

	// 선은 마지막 마우스 커서 위치를 추가로 정의해준다.
	Line(int argshap, int argX, int argY, int EndX, int EndY) {
		super(argshap, argX, argY);

		this.EndX = EndX;
		this.EndY = EndY;

	}

}

// 네모와 원은 사이즈가 필요하기 때문에 변수를 추가로 정의해준다.
class Rect extends Shape {
	int width, height;

	Rect(int argshap, int argX, int argY, int width, int height) {
		super(argshap, argX, argY);

		this.width = width;
		this.height = height;

	}
}

class Circle extends Shape {
	int width, height;

	Circle(int argshap, int argX, int argY, int width, int height) {
		super(argshap, argX, argY);
		this.width = width;
		this.height = height;
	}
}

class MyFrame extends JFrame {
	// 그린 도형을 저장시킬 벡터를 찍어준다.
	protected Vector<Shape> vc = new Vector<Shape>();

	// 도형이 출력될 오른쪽 판넬
	class right_J extends JPanel{

		int width, height, x, y;
		Point start, end;

		right_J() {
			try{
				this.addMouseListener(new MouseAdapter() {
					// 선을 눌렀을 경우에 처음 누른 좌표를 받아온다.
					public void mousePressed(MouseEvent e) {
						if (shape.equals("Line")) {
							start = e.getPoint();
						}

					}

					// 선을 그리고 난 후 마지막 좌표를 받아와 도형을 그려준 후 벡터 객체에 저장시켜준다.
					public void mouseReleased(MouseEvent e) {
						if (shape.equals("Line")) {
							end = e.getPoint();
							Graphics g = rightpanel.getGraphics();
							g.drawLine(start.x, start.y, end.x, end.y);
							Shape d_L = new Line(1, start.x, start.y, end.x, end.y);
							vc.add(d_L);
						}
					}

					public void mouseClicked(MouseEvent e) {

						Graphics g = rightpanel.getGraphics();

						switch (shape) {
						// 네모를 선택했을 경우 처음 누른 좌표를 불러와서 그려준다.
						case "Rect":
							width = 100;
							height = 100;
							x = e.getX() - width / 2;
							y = e.getY() - height / 2;
							g.setColor(Color.YELLOW);
							g.fillRect(x, y, width, height);
							Shape d_R = new Rect(2, x, y, width, height);
							vc.add(d_R);
							break;

						// 원을 선택했을 시
						case "Circle":
							width = 100;
							height = 100;
							x = e.getX() - width / 2;
							y = e.getY() - height / 2;
							g.drawOval(x, y, width, height);
							Shape d_C = new Circle(3, x, y, width, height);
							vc.add(d_C);
							break;
						}
					}
				});
			}catch(NullPointerException npe){
				System.out.println("NullPointerException!");
			}
			
			
		}

		// 프레임을 상태바로 내린 후 다시 올렸을 때 도형이 사라지지 않고 계속 있도록 하기 위한(다시 원상태로 그려줄) paint
		public void paintComponent(Graphics g) {
			//도형을 그릴 때마다 저장시켜준 백터를 불러와 다시 출력시켜준다.
			for (int i = 0; i < vc.size(); i++) {
				Shape o = vc.get(i);
				if (o.Shape == 1) {
					Line o1 = (Line) vc.get(i);
					g.drawLine(o1.StartX, o1.StartY, o1.EndX, o1.EndY);
				} else if (o.Shape == 2) {
					Rect o11 = (Rect) vc.get(i);
					g.drawRect(o11.StartX, o11.StartY, o11.width, o11.height);
				} else if (o.Shape == 3) {
					Circle o11 = (Circle) vc.get(i);
					g.drawOval(o11.StartX, o11.StartY, o11.width, o11.height);
				}

			}
		}
	}

	JPanel leftpanel, rightpanel;
	JButton BtnLine, BtnRect, BtnCircle, BtnClear, check;
	Color BackgroundColor;
	String shape;

	MyFrame() {

		setTitle("GUI_grow");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

		this.setSize(1000, 1000);
		this.getContentPane().setLayout(new GridLayout(0, 2));
		leftpanel = new JPanel();
		rightpanel = new right_J();

		this.add(leftpanel);
		this.add(rightpanel);

		leftpanel.setLayout(new GridLayout(4, 0));

		BtnLine = new JButton("線");
		BtnRect = new JButton("四角");
		BtnCircle = new JButton("丸");
		BtnClear = new JButton("消す");
		BackgroundColor = BtnCircle.getBackground();

		leftpanel.add(BtnLine);
		leftpanel.add(BtnRect);
		leftpanel.add(BtnCircle);
		leftpanel.add(BtnClear);

		BtnLine.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnLine.setBackground(Color.YELLOW);
					shape = "Line";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});
		
		BtnRect.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnRect.setBackground(Color.YELLOW);
					shape = "Rect";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});

		BtnCircle.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					BtnCircle.setBackground(Color.YELLOW);
					shape = "Circle";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});
		
		BtnClear.addMouseListener(new MouseAdapter() {
			public void mouseClicked(MouseEvent e) {
				if (e.getSource() != check) {
					vc.clear();
					repaint();
					
					shape = "";
				}
				if (check != null) {
					check.setBackground(BackgroundColor);
				}
				check = (JButton) e.getSource();
			}
		});

		// fail상단바
		JMenuBar menuBar = new JMenuBar();
		JMenu menu = new JMenu("File");
		menuBar.add(menu);

		JMenuItem menuItem1 = new JMenuItem("save");
		menu.add(menuItem1);
		menu.addSeparator();
		JMenuItem menuItem2 = new JMenuItem("Load");
		menu.add(menuItem2);
		menu.addSeparator();
		JMenuItem menuItem3 = new JMenuItem("exit");
		menu.add(menuItem3);
		this.setJMenuBar(menuBar);
		
		//저장 버튼을 눌렀을 때
		menuItem1.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				
				JFileChooser fileChooser = new JFileChooser();
	            //확장자를 추가시켜준다.
				fileChooser.setFileFilter(new FileNameExtensionFilter("myBoard", "dyjang"));
				fileChooser.setFileFilter(new FileNameExtensionFilter("default", "txt"));
	            
				//내가 설정한 확장자 명을 가지고 온다.
				String fileExtension = ((FileNameExtensionFilter)fileChooser.getFileFilter()).getExtensions()[0];
	            
				//showSaveDialog->파일 오픈 다이얼로그를 띄움, APPROVE_OPTION->취소, 닫기 버튼이 아니라 확인을 눌렀는지 확인	
	            if(fileChooser.showSaveDialog(menuItem1) == JFileChooser.APPROVE_OPTION){
	            	//내가 지정한 파일명을 가지고 온다.
	            	String fileName = fileChooser.getSelectedFile().getAbsolutePath();
	            	
	            	try{
	            		//파일 입출력을 담당하는 클래스의 객체를 찍고 값을 전송
	            		InputOutput objToFile = new InputOutput(true , fileName + "." + fileExtension);
	            		
	            	}catch(Exception argException){
	            		System.out.println("3: " + argException.getMessage());
	            	}
	            }
			}
		});

		menuItem2.addActionListener(new ActionListener() {

			@Override
			public void actionPerformed(ActionEvent e) {
				
				JFileChooser fileChooser = new JFileChooser();
				
	            fileChooser.setFileFilter(new FileNameExtensionFilter("myBoard", "dyjang"));
	            fileChooser.setFileFilter(new FileNameExtensionFilter("default", "txt"));
	            
	            //String fileExtension = ((FileNameExtensionFilter)fileChooser.getFileFilter()).getExtensions()[0];
	            
	            if(fileChooser.showOpenDialog(menuItem2) == JFileChooser.APPROVE_OPTION){
	            	String fileName = fileChooser.getSelectedFile().getAbsolutePath();
	            	
	            	try{
	            		InputOutput objToFile = new InputOutput(false , fileName);
	            		
	            	}catch(Exception argException){
	            		System.out.println("3: " + argException.getMessage());
	            	}
	            }
				
			}
		});

		menuItem3.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				
			}
		});

				setVisible(true);
	}
	
	class InputOutput{
		
		InputOutput(boolean bool, String fileName){
			if(bool){
				try {
					FileOutputStream fOut = new FileOutputStream(fileName);
					ObjectOutputStream oos = new ObjectOutputStream(fOut);
					oos.writeObject(vc);
					
					/*//스트림 안에 남아있는 데이터를 강제로 내보내는 역할
					oos.flush();
					*/
					fOut.close();
					oos.close();
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}else{
				
				FileInputStream fIn;
				ObjectInputStream oIs;
				try {
					fIn = new FileInputStream(fileName);
					oIs = new ObjectInputStream(fIn);
					vc = (Vector<Shape>) oIs.readObject();
					repaint();
					fIn.close();
					oIs.close();
				} catch (Exception e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		}
	}
}

public class GUI_Grow {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		MyFrame f = new MyFrame();
	}

}
