#include <bits/stdc++.h>
using namespace std;

long long gcd(int a, int b){
    if(b == 0) return a;
    return gcd(b, a%b);
}

long long lcm(int a, int b){
    return (a/gcd(a,b)) * b;
}

int main()
{
    int n,a, b;
    cin >> n;
    for(int i = 0; i < n; i++){
        cin >> a >> b;
        // printf("%d %d\n",gcd(a,b),lcm(a,b));
        cout << gcd(a,b) << " " << lcm(a,b) << "\n";
    }
}