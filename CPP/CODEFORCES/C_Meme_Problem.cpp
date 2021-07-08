//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-7
#define MAX 10000005
#define ll long long
#define gch getchar();
#define cls system("cls");
#define dbg cout << "Debug LN : " << __LINE__ << endl;
#define w(t) while(t--){ solve(); }

void solve(){
    int d;


    cin >> d;
    double L = 0, R = d, mid;
    double big=0,small=0;

    if(d == 4){
        printf("Y %.9lf %.9lf\n", 2.000000000, 2.000000000);
        return;
    }else if(d == 0){
        printf("Y %.9lf %.9lf\n", 0.000000000, 0.000000000);
        return;
    }else if(d < 4){
        printf("N\n");
        return;
    }

    // while(fabs(L-R) > eps){
    while(fabs(d - (big*small)) > eps){
        mid = L + (R-L)/2;
        big = mid;
        small = d - mid;
        if(big * small > d) L = mid;
        else R = mid;
        // cout << fabs((big + small) - (big*small)) << endl;
        // cout << setprecision(15) << fixed << L << " - " << R << " = " <<  fabs(L-R) << " > " << eps << endl;
        cout << setprecision(8) << fixed << endl;
        cout << fabs(d - (big*small)) << " >= " << eps << endl;
        // if(fabs(d - (big*small)) <= eps)
        //     break;
    }
    printf("Y %.9lf %.9lf\n",big,small);
    
}

int main()
{
    int t;   cin >> t;   w(t);

}