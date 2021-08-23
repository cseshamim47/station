//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define w(t) while(t--){ solve(); }
int cnt;

void solve(){
    int n;
    cin >> n;
    n++;
    int a[n];
    int b[n];
    for(int i = 1; i < n; i++){
        cin >> a[i];
    }
    int decrease = 0, increase = 0;
    for(int i = 1; i < n; i++){
        cin >> b[i];
        if(a[i] > b[i]) decrease +=  a[i] - b[i];
        else if(a[i] < b[i]) increase += b[i] - a[i]; 
    }
    vector<int> inc,dec;
    if(decrease != increase) cout << -1 << "\n";
    else if(increase == 0) cout << 0 << "\n";
    else{
        for(int i = 1; i < n; i++){
            if(a[i] > b[i]){
                int x = a[i] - b[i];
                while (x--){
                    dec.push_back(i);
                }
            }else if(a[i] < b[i]){
                int x = b[i] - a[i];
                while (x--){
                    inc.push_back(i);
                }
            }
        }
        cout << increase << "\n";
        for (int i = 0; i < inc.size(); i++){
            cout << dec[i] << " " << inc[i] << "\n";
        }
    }
    
}

int main()
{
      //        Bismillah
     int t;   cin >> t;   w(t);
    // cls


}