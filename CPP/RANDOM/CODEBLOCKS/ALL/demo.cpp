#include <bits/stdc++.h>
using namespace std;


int main()
{
    int ary[3][2] = {{11,22},{33,44},{55,66}};
    cout << ary[2][1] << endl;
    cout << *(*(ary+2)+1) << endl;
    cout << *ary[2]+1 << endl;
}
