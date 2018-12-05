#include<iostream>
using namespace std;

class INTEGER{
    private:
        int value;
    public:
        INTEGER():value(0){
        }
        INTEGER(int a):value(a){

        }
        ~INTEGER(){
        }

        INTEGER operator +(INTEGER x){
            int a = value + x.value;
            return INTEGER(a);
        }
        INTEGER operator -(INTEGER x){
            int a = value - x.value;
            return INTEGER(a);
        }
        INTEGER operator *(INTEGER x){
            int a = value * x.value;
            return INTEGER(a);
        }
        INTEGER operator /(INTEGER x){
            int a = value / x.value;
            return INTEGER(a);
        }
        INTEGER operator %(INTEGER x){
            int a = value % x.value;
            return INTEGER(a);
        }

        void operator +=(INTEGER b){
            value = value + b.value;
        }
        void operator -=(INTEGER b){
            value = value - b.value;
        }
        void operator *=(INTEGER b){
            value = value * b.value;
        }
        void operator /=(INTEGER b){
            value = value / b.value;
        }
        bool operator >=(INTEGER b){
            if(value>=b.value){
                return true;
            }
            else{
                return false;
            }
        }
        bool operator <=(INTEGER b){
            if(value<=b.value){
                return true;
            }
            else{
                return false;
            }
        }
        bool operator ==(INTEGER b){
            if(value==b.value){
                return true;
            }
            else{
                return false;
            }
        }
        bool operator !=(INTEGER b){
            if(value!=b.value){
                return true;
            }
            else{
                return false;
            }
        }


        bool operator >(INTEGER b){
            if(value>b.value){
                return true;
            }
            else
                return false;

        }
        bool operator <(INTEGER b){
            if(value<b.value){
                return true;
            }
            else
                return false;

        }
        int operator ++(){
            return ++value;
        }
        int operator ++(int){
            return value++;
        }

        int operator --(){
            return --value;
        }
        int operator --(int){
            return value--;
        }

        void display(){
            cout<<value<<" ";
        }
};

class point{
    private:
        INTEGER x;
        INTEGER y;
    public:
        point():x(0),y(0){
        }
        point(INTEGER a, INTEGER b): x(a), y(b){

        }
        ~point(){
        }
        point operator +(point p){
            INTEGER a = x + p.x;
            INTEGER b = y + p.y;
            return point(a,b);
        }
        point operator -(point p){
            INTEGER a = x - p.x;
            INTEGER b = y - p.y;
            return point(a,b);
        }
        bool operator >(point p){
            INTEGER a = (x*x + y*y);
            INTEGER b = (p.x*p.x + p.y*p.y);
            //a.display();
            //b.display();
            return (a>b)?true:false;
        }
        void display_me(){
            cout<<"This is display"<<endl;
            x.display();
            y.display();
            cout<<endl;
        }

};

int main(){
    point p1(8,5),p2(9,7);
    point p3;
    p3 = p1 + p2;
    p3.display_me();

    /*INTEGER I1,I2=25;
    I1 = ++I2;
    I1.display();*/

    if(p1>p2){
        cout<<"p1 is greater or equal to p2"<<endl;
    }
    else{
        cout<<"p2 is greater or equal to p1"<<endl;
    }
    return 0;
}
