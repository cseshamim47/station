#include <iostream>
using namespace std;

int main()
{
    int r,l;
    cin >> r >> l;
    char arr[r][l];
    int ans[10][10];

    for(int i = 0; i<r; i++)
    {
        for(int j = 0; j<l; j++)
        {
            cin >> arr[i][j];
        }
    }
    int ar=-1,al=0,count=0;
    int ar2=0 , al2 = 0;
    int mr = 0, ml = 0;
    for(int i = 0; i<r; i++)
    {
        for(int j = 0; j<l; j++)
        {
            if(arr[i][j]=='*'){
                if(ar==-1 && count!=2){
                    //cout << "Working" << endl;
                    ar = i;
                    al = j;
                    count++;
                    
                }else if(count!=2){
                    ar2 = i;
                    al2 = j;
                    count++;
                }else {
                    mr = i;
                    ml = j;

                }
                
            }
        }
        if(count!=2 && count==1){
            if(count!=0){
                mr = ar;
                ml = al;
            }
            ar = -1;
            al = -1;
            count = 0;
        }
    }

    // cout << ar << " " << al << endl;
    // cout << ar2 << " " << al2 << endl;
    // cout << mr << " " << ml << endl;
    int anr,anl;
    if(al==ml){
        anr = mr+1; // m = missing
        anl = al2+1;
    }else{
        anr = mr+1;
        anl = al+1;
    }
    cout << anr << " " << anl;
}