#include <iostream>
using namespace std;
void print1(short *ptr, int rows)
{
  int i;

  cout << "Address Contents" << endl;
  for (i=0; i < rows; i++)
  cout << ptr+i << " " << *(ptr+i) << endl;
}

int main(){
short one[] = {0, 1, 2, 3, 4}; //Goal: print out address and value


 print1(one, 5);
return 1;
}
//2 bytes store the data (gap is 2)