//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
ll cnt;

void solve(){}

int main()
{
      //        Bismillah
     // int t;   cin >> t;   w(t);
    // cls
    ll n,m;
    cin >> n >> m;
    if(n > m) swap(n,m);

    // ll mult = 5,i = 2;
    // int iteration = 0;
    // while(true){
    //     if(n>=mult) cnt += mult - 1; 
    //     if(n < mult and m >= mult) cnt += n;
    //     // cout << n << " " << m << " " << mult << " " << cnt << endl;
    //     // gch
    //     if(n < mult and m < mult){
    //         ll temp = mult - m;
    //         temp = n - temp + 1;
    //         if(temp <= 0) break;
    //         else cnt += temp; 
    //     }
    //     mult = 5 * i;
    //     i++;
    //     iteration++;
    // }

    for(int i = 1; i <= m; i++){
        cnt += (n+(i%5))/5;
        cout << n << "+" << i%5 << "/5 : " << cnt <<  endl;
        // gch  
    }
    cout << cnt << endl;
    // cout << iteration << endl;
}


// 1    1
// 2    2
// 3    3
// 4    4
// 5    5
//      6
//      7
//      8
//      9
//      10
//      11
//      12