//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }
int cnt;
void solve(){ }

int main()
{
     //        Bismillah
    // int t;   cin >> t;   w(t);
    cls
    int i,j;
for (i = 0; i < 5; i++) {
    cnt++;
    for (j = 5; j > i; j--) {
        cnt++;
    }
}
cout << cnt << endl;

}